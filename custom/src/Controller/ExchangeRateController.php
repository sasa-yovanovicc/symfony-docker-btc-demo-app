<?php

namespace App\Controller;

use App\Helper\ExchangeRateHelper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExchangeRateController extends AbstractController
{
    private ExchangeRateHelper $exchangeRateHelper;

    public function __construct(ExchangeRateHelper $exchangeRateHelper)
    {
        $this->exchangeRateHelper = $exchangeRateHelper;
    }

    /**
     * @Route("/", name="rates_btc")
     */
    public function getRates(): Response
    {
        $url = $this->getParameter('app.exchange_rates_url');
        $rates = $this->exchangeRateHelper->getRates($url);

        return $this->render('rates.html.twig', [
            'time' => $rates["time"]["updated"],
            'usd' => $rates["bpi"]["USD"]["rate_float"],
            'eur' => $rates["bpi"]["EUR"]["rate_float"],
        ]);
    }
}
