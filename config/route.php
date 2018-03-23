<?php
return function(\FastRoute\RouteCollector $r) {
			$r->addRoute('GET', '/', 'MainController/index');
			// {id} must be a number (\d+)
			$r->addRoute('GET', '/page/{id:\d+}', 'MainController/index');
			// The /{title} suffix is optional
			$r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
			$r->addRoute('GET', '/currency', 'CurlController/currency');
			$r->addRoute('GET', '/countries[/{letter}]', 'CurlController/countries');
};
