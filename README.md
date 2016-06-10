#ElasticSearch and Symfony

- [install elasticsearch](app/Resources/docs/elasticsearch.md)
- [queries with marvel](app/Resources/docs/queries-and-marvel.md)


##[Symfony](http://www.symfony.com)
 
<pre>
~ $ composer install 
</pre>

configure Symfony app_dev.php to localhost:
<pre>
~$ php -S localhost:8080 -t web web/app_dev.php
</pre>
or
<pre>
~$ php app/console server:run
</pre>

###Elastica PHP Client

Added to composer.json:
<pre>
        "ruflin/elastica": "2.*",
</pre>

* [Elastica php client](http://elastica.io)
* [Elastica vs Elasticsearch-php](http://elastica.io/elastica-vs-elasticsearch-php/)
* [GitHub elasticsearch-php](https://github.com/elasticsearch/elasticsearch-php)


###FriendsOfSymfony [FOSElasticaBundle](https://github.com/FriendsOfSymfony/FOSElasticaBundle)

This [bundle](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/index.md) provides integration with ElasticSearch and Elastica with Symfony2

<pre>php composer.phar require friendsofsymfony/elastica-bundle "~3.0"</pre>
* [Installation](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/setup.md)
* [Usage](https://github.com/FriendsOfSymfony/FOSElasticaBundle/blob/master/Resources/doc/usage.md)


#ElasticSearch, Sphinx and Solr comparison links

* [FosElasticaBundle Symfony Barcelona (YouTube es)](http://www.youtube.com/watch?v=eZB9m0FTu8g&app=desktop)
* [SocialCast - Solr vs. ElasticSearch](http://blog.socialcast.com/realtime-search-solr-vs-elasticsearch/)
* [DBEngines - Solr vs. ElasticSearch vs. Sphinx](http://db-engines.com/en/system/Elasticsearch%3BSolr%3BSphinx)
* [JeremyFelt Github - Solr vs. ElasticSearch vs. Sphinx](https://gist.github.com/jeremyfelt/8230088)
* [StackOverflow](http://stackoverflow.com/questions/2271600/elasticsearch-sphinx-lucene-solr-xapian-which-fits-for-which-usage)
