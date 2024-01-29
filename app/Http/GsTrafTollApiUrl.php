<?php

namespace App\Http;


use Symfony\Component\Console\Output\ConsoleOutput;

class GsTrafTollApiUrl
{



    /**
//     * Custom API Handler
     * Used to request API and capture responses
     *
     * @var \Path\To\Your\Internal\Api\Handler
     */

    //
//    const isEnvProd = false;
    const isEnvProd = true;

    const CAPTURE_URL = "/api/v1/captures";
    const RECENT_CAPTURE_LIST_URL = "/api/v1/captures/recent";

    const CAPTURE_LIST_URL = "/api/v1/captures/list";
    const REVENUE_HEAD_LIST_URL = "/api/v1/revenue-heads";
    const AGENCIES_LIST_URL = '/api/v1/agencies';
    const VEHICLE_LIST_URL = "/api/v1/vehicles";
    const VEHICLE_DOCS_LIST_URL = "/api/v1/vehicle-docs";
    const REVENUE_ITEMS_LIST_URL = "/api/v1/revenue-items";

    const USER_LIST_URL = "/api/v1/users";

    const LIST_LGAS_URL = "/api/v1/states/by-name";
    const LIST_REVENUE_HEAD_BY_CODE_URL = "/api/v1/revenue-heads/by-code";
    const LIST_REVENUE_ITEMS_BY_CODE_URL = "/api/v1/revenue-items/by-code";
    const INVOICE_LIST_URL = "/api/v1/invoices";
    const PAYMENT_LIST_URL = "/api/v1/payments";
    const ROLE_LIST_URL = "/api/v1/roles";
    const SMS_LIST_URL ="/api/v1/sms" ;


    public static function get(string $path)
    {
        if (!self::isEnvProd) {
            $BS_URL = env('API_BASE_URL');
        } else {
            $BS_URL = env('PROD_API_BASE_URL');
        }
        // dd($BS_URL);

        $output = new ConsoleOutput();

        $output->writeln("BASE URL REQUEST " . $BS_URL . $path);

        return $BS_URL . $path;


    }



}

?>
