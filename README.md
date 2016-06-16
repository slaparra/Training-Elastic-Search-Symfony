#ElasticSearch and Symfony
--------------------------

##Dependencies
The code inside the project works with Ruflin Elastica 3.2 and [Elasticsearch 2.3.2](https://github.com/elasticsearch/elasticsearch/tree/v2.3.2)


- [install elasticsearch](app/Resources/docs/elasticsearch.md)
- [queries with marvel](app/Resources/docs/queries-and-marvel.md)
- [elasticsearch php clients](app/Resources/docs/elasticsearch-php-clients.md)


###[Symfony](http://www.symfony.com)
 
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

#ElasticSearch, Sphinx and Solr comparison links

* [FosElasticaBundle Symfony Barcelona (YouTube es)](http://www.youtube.com/watch?v=eZB9m0FTu8g&app=desktop)
* [SocialCast - Solr vs. ElasticSearch](http://blog.socialcast.com/realtime-search-solr-vs-elasticsearch/)
* [DBEngines - Solr vs. ElasticSearch vs. Sphinx](http://db-engines.com/en/system/Elasticsearch%3BSolr%3BSphinx)
* [JeremyFelt Github - Solr vs. ElasticSearch vs. Sphinx](https://gist.github.com/jeremyfelt/8230088)
* [StackOverflow](http://stackoverflow.com/questions/2271600/elasticsearch-sphinx-lucene-solr-xapian-which-fits-for-which-usage)
