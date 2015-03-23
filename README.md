Eoa (E-Commerce on Angular)
=========

This project is based on the Magento on Angular Project by Adam Timberlake and has been adopted and changed for the purposes of my Masterthesis with the topic "Integration of various backends into a JavaScript-based shop system". The project has been altered to function in a Microservice Architecture. For that, the backend was changed to serve as an API Gateway, which feeds the client data from remote services. For proof of concept a Magento CatalogService and an OXID CatalogService have been implemented. The services are in a private repository. Let me know if you're interested and I will send you the source code.

Based on MOA
---------

Have a look at the MOA project:
https://github.com/Wildhoney/Magento-on-Angular

Abstract of my thesis (in German)
---------

 Die vorliegende Arbeit untersucht das Konzept, eine Microservice Architektur auf ein E-Commerce System anzuwenden und mit einer javascript-basierten Single Page Applikation auf Frontendseite zu verknüpfen. Anhand einer Machbarkeitsstudie werden Komplexitäten, Probleme und mögliche Verbesserungen einer solchen Architektur ausgearbeitet und dokumentiert. In der praktischen Umsetzung wird mit drei virtuellen Maschinen eine sachgerechte Architektur verteilter Systeme konstruiert. Es kommt ein AngularJS Frontend zum Einsatz, welches Anfragen an ein API Gateway sendet. Dieses leitet die Anfragen an die entsprechenden REST Schnittstellen der Microservices weiter. Es werden Microservices für ein Magento- sowie ein OXID-Shopsystem entwickelt. Die entworfene Architektur erlaubt den Austausch einzelner Services verschiedener Systeme. Zudem ermöglicht sie eine Erweiterung um Service-Komponenten sowie zusätzliche Backend-Systeme. Ferner demonstriert diese Arbeit ein Konzept zur deutlich effizienteren Filterung von Produktdaten im Vergleich zu einem Magento Shopsystem. Diese Arbeit offenbart außerdem Komplexitäten der Architektur. Hierzu zählen die Handhabung von Sessions sowie die Warenkorb-Logik. Auf diese wird im letzten Kapitel detailliert eingegangen und es werden verschiedene Lösungsansätze diskutiert. Die in dieser Arbeit gewonnenen Erkenntnisse, können mit dem Quellkode als Basis für die Erweiterung zu einem service-basierten E-Commerce System dienen.


Preamble (in German)
----------

Ziel dieser Arbeit ist es, das Konzept der Microservices auf ein E-Commerce System anzuwenden und mit einer javascript-basierten Single Page Applikation auf der Frontendseite zu verbinden. Es geht nicht darum, ein vollständig funktionsfähiges Microservice E-Commerce System zu implementieren, sondern vielmehr Erfahrungen, Probleme und den Fortschritt in der Arbeit mit Microservices für eine E-Commerce Applikation zu sammeln und für eine Weiterentwicklung in diesem Bereich zu dokumentieren.

Für die Umsetzung wird mit Magento on Angular ein vorhandenes Projekt eingesetzt und in eine Microservice Architektur umstrukturiert. Anhand unterschiedlicher Provider Schnittstellen werden die Funktionsaufrufe auf Serverseite in verschiedene Komponenten aufgeteilt, die zur Integration von systemspezifischen Provider Klassen implementiert werden. Diese leiten die Aufrufe schließlich an die entsprechenden Microservices weiter. Zunächst integriert ein Magento Shopsystem alle Provider Komponenten, anschließend wird eine Provider-Komponente mit der eines OXID Systems ausgetauscht. Dadurch wird gezeigt, dass in der neuen Architektur Komponenten und Services so gekapselt sind, dass sie zwischen verschiedenen Systemen ausgetauscht werden können.