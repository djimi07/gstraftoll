<?php
return
  (
    <<<EN
{
  "menu": [
    {
      "url": "dashboard",
      "name": "Dashboard",
      "icon": "home",
      "badgeClass": "badge badge-light-warning badge-pill ml-auto mr-1",
      "slug": ""
    },
    {
      "navheader": "ANPR Service",
      "slug": ""
    },

    {
      "name": "Capture Log",
      "icon": "file-text",
      "slug": "",
      "submenu": [
        {
          "url": "captures",
          "name": "All Log",
          "icon": "circle",
          "slug": "app-invoice-list"
        }



      ]
    },


{
      "navheader": "Vehicles",
      "slug": ""
    },
    {
      "name": "Register Vehicle",
      "url": "/vehicles/register",
      "icon": "file-text",
      "slug": ""
    },
    {
      "name": "Vehicles Log",
       "url": "/vehicles",
      "icon": "file-text",
      "slug": ""

    },






{
      "navheader": "Messages",
      "slug": ""
    },
    {
      "name": "SMS Log",
      "icon": "file-text",
      "slug": "",
          "url": "/sms"

    },
    {
      "name": "Send SMS",
      "icon": "file-text",
      "slug": "",
    "url": "/sms/create"



    },



    {
      "navheader": "Compliance",
      "slug": ""
    },


    {
      "name": "Hackney Permit",

      "icon": "file-text",
      "slug": "",
      "submenu": [
        {
          "url": "/hackney/buy?code=AIRS0000",
          "name": "Process Permit",
          "icon": "circle",
          "slug": "app-invoice-list"
        },
        {
          "url": "/hackney/buy?code=AMVAS410411",
          "name": "Process Tipper/Lorry",
          "icon": "circle",
          "slug": "app-invoice-list"
        }


      ]
    },

 {
      "navheader": "Offences",
      "slug": ""
    },


    {
      "name": "Hackney Permit",
      "icon": "file-text",
      "slug": ""

    },



    {
      "navheader": "Invoicing & Payments",
      "slug": ""
    },
    {
      "name": "Invoices",
      "icon": "file-text",
      "slug": "",
      "submenu": [
        {
          "url": "/invoices",
          "name": "Invoices",
          "icon": "circle",
          "slug": "app-invoice-preview"
        }

      ]
    },
    {
      "name": "Payments",
      "icon": "file-text",
      "slug": "",
      "submenu": [
        {
          "url": "/payments",
          "name": "Payments",
          "icon": "circle",
          "slug": "app-invoice-preview"
        }
      ]
    },
    {
      "name": "Payment Verification",
      "icon": "file-text",
      "slug": "",
      "submenu": [

      ]
    },


    {
      "navheader": "BI Reports",
      "slug": ""
    },


    {
      "name": "Recent Offenders",
      "icon": "file-text",
      "slug": "",
      "submenu": [

      ]
    },




    {
      "navheader": "Settings",
      "slug": ""
    },

    {
      "name": "Revenue Heads",
      "icon": "file-text",
      "slug": "",
      "url": "/revenue-head"
    },
    {
      "name": "Revenue Items",
      "icon": "file-text",
      "slug": "",
      "url": "/revenue-item"
    },



       {
          "url": "/users",
          "name": "Users",
           "icon": "file-text",
          "slug": "app-invoice-list"
        },


    {
      "name": "Default Configurations",
      "icon": "file-text",
      "slug": ""
    }
  ]
}
EN);
