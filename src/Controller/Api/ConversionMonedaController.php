<?php

namespace App\Controller\Api;

use App\Entity\ConversionMoneda;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


/**
 * @Route("/api/moneda", name="api_moneda_")
 */
class ConversionMonedaController extends AbstractFOSRestController
{
    protected $em;
    private $client;
    private $params;

    public function __construct(EntityManagerInterface $em, HttpClientInterface $client, ParameterBagInterface $params)
    {
        $this->em = $em;
        $this->client = $client;
        $this->params = $params;
    }

    /**
     * @Rest\Post("/convertir", name="listado")
     */
    public function index(Request $request)
    {
        $from = $request->request->get('from'); // == Otenemos params para construir url
        $to = $request->request->get('to'); // == Otenemos params para construir url
        $monto = $request->request->get('monto') !== null ? $request->request->get('monto') : 1; // == Monto a convertir
        if (isset($from) && !empty($from) && isset($to) && !empty($to)) {
            $formar_url = $this->formarUrl(['from' => $from, "to" => $to]); // == Construimos url con las divisas
            $response = $this->client->request('GET', $formar_url->url); // consultamos endpoint
            $content = $response->getContent(); // $contentType = 'application/json'
            $content = $response->toArray(); // convertimos contenido a array
            $total = $monto * $content[$formar_url->from_to]; // total de monto convertido

            $data = [
                'total' => $total,
                'tipo_cambio' => $content[$formar_url->from_to]
            ]; // array para respuesta al cliente

            // == guardar en bd
            $conversion = new ConversionMoneda;
            $conversion->setAmount($monto);
            $conversion->setFromCurrency($formar_url->from);
            $conversion->setToCurrency($formar_url->to);
            $conversion->setTotal($monto);
            $this->em->persist($conversion);
            $this->em->flush();

            return $this->view($data, Response::HTTP_OK);
        } else {
            $data = [
                'message' => 'Error en los datos enviados'
            ];
            return $this->view($data, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Metodo para formar url con las divisas
     */
    private function formarUrl(array $data)
    {
        $url = "https://free.currconv.com/api/v7/convert?q=CURRENCY&compact=ultra&apiKey={$this->params->get('api_key_currency')}";

        if (isset($data['from']) && isset($data['to'])) {
            $from = strtoupper(trim($data['from'])); // quitamos espacios y pasamos a mayusculas
            $to = strtoupper(trim($data['to'])); // quitamos espacios y pasamos a mayusculas
            $from_to = "{$from}_{$to}"; // se concatena from y to
            $url = str_replace("CURRENCY", $from_to, $url); // reemplazamos CURRENCY en url
            return (object)[
                'url' => $url,
                'from_to' => $from_to,
                'from' => $from,
                'to' => $to
            ];
        }
    }
}