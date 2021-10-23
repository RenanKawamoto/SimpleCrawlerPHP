# SimpleCrawlerPHP

- Esse é uma biblioteca de PHP, para simplificar a criação de web crawler .

## Instalação via composer:
- Shell:
```
    composer require 'code-dragons/simple-crawler-php';
```

## Requisitos:
- Php versão utilizavel: <= 7;

## "Use" necessário para usar a biblioteca:
```php
    use SimpleCrawler/Crawler;
```

## O que você tem que saber para usar essa biblioteca:
- Para usar essa biblioteca corretamente é necessário conhecer o conceito de Xpath, que de maneira simplificada, é uma forma de acessar a arquitetura html com uma sintaxe especifica:

    - Sintaxe simplificada:
        - `//` => usado para definir qual o componente html será o ponto inicial para buscar o componente desejado:
            - Exemplo: `//body`
        - `[@id='nome_do_id']` => usado para definir o componente e seu id:
            - Exemplo: `//div[@id='teste']`
            - OBS: é possível usar @class como o @id;

## Sintaxe:
```php
    <?php 
        use SimpleCrawler/Crawler;

        $crawler = new Crawler("<URL>");
        $crawler->setRule("<regra_Xpath>");
        $crawler->searchInformationByRule();

        foreach( $crawler->getInformationsOfSearch() as $elementos)
        {
            echo $elementos;
        }
    ?>
```

## Exemplo:
```php
    <?php 
        require_once 'vendor/autoload.php';
        use SimpleCrawler\Crawler;

        $crawler = new Crawler("https://www.climatempo.com.br/previsao-do-tempo/cidade/406/bauru-sp");
        $crawler->setRule("//span[@id='min-temp-1']");
        $crawler->searchInformationByRule();
        echo "temperatura minima em Marilia: " . $a->getInformationsOfSearch()[0];
    ?>
```
