<?php

/*
   TrueCaller offers its Web UI version also, where you can trace phone number's identity.
   For people like me, who are great believers of Laptops and Desktop Machines, we miss out
   certain things which sometimes become a part of our mockery.

   But you got to realize that people can literally do anything if they have this piece of hardware
   called computer with them.

   This trueCallerTerminal would be an alias for Linux users to identify the person using TrueCaller
   service by just typing the phone number on the terminal.
*/
    include_once 'simple_html_dom.php';

    function constructRequest($phoneNumber) {

        $baseURL = "www.truecaller.com/in/";
        $finalURL = $baseURL.$phoneNumber;

        return 'http://'.$finalURL;
    }

    function sendRequest($phoneNumber) {

        $requestURL = constructRequest($phoneNumber);
        $curl = curl_init();
        $setUserAgent = "Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36";
        $setCookie = "YOUR FACEBOOK COOKIE";

        curl_setopt($curl,CURLOPT_URL, $requestURL);
        curl_setopt($curl,CURLOPT_USERAGENT,$setUserAgent);
        curl_setopt($curl,CURLOPT_COOKIE,$setCookie);

        $result = curl_exec($curl) or die(curl_error($curl));
        curl_close($curl);

        return $result;
    }

    function getTextBetweenTags($string, $tagname) {
        // Create DOM from string
        $html = str_get_html($string);

        $titles = array();
        // Find all tags
        foreach($html->find($tagname) as $element) {
            $titles[] = $element->plaintext;
        }
    }

    getTextBetweenTags(sendRequest('9772536250'),'h1');




