#!/usr/bin/env bash

docker run --rm -it --volume $PWD:/var/www mikaelcom/wsdltophp:latest generate:package \
	--urlorpath='http://www.dneonline.com/calculator.asmx?WSDL' \
	--destination='/var/www/CalcSdk' \
	--composer-name='foo/calcsdk' \
	--namespace="CalcSdk" \
	--force
