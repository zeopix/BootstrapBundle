This bundle is under early development stage.
============

Objective
============
  Provide an easy way to make a simple and customizable layout using twitter/bootstrap and many Twig helpers.
  
  With bootstrapBundle you will be able to generate accessible layouts for your Symfony2 project with few minutes, this tool is not designed to make a 100% fully customizable layout, but it's a good starting point.
  
  Flat HTML ( no twig helpers ) Generators will be added.
  
  If you have any suggestion or special need please open a issue or a pull request.
  
  
ToDo
============
  *Render **toolbar** items in the same order that they were set using the twig helper.
  


Installation
============


Example in your ``config.yml``:

            iga_bootstrap:
       



Usage
============

There is a helper for twig templating. 

Simple Fixed layout
------------
		
			{{ bootstrap_container('here the layout html') }}

or

			{% set content %}
			here your twig code
			{% endset%}
			
			{{ bootstrap_container(content) }}
			
Topbar
------------
		
			{{ bootstrap_toolbar({  'title' : 'My proooject', 
							'links' : { 
								'Google' : { 
									'caption' : 'Google.es',
									'href' : 'http://www.google.es', 
									'class' : 'active',
									'attr' : { 'target' : '_blank'} 
									}, 
								'ManyFew' : 'http://www.many-few.com' 
								}, 
							'search' : '/path/to/search'
			}) }}
			
			
			
	
