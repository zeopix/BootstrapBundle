This bundle is under early development stage.
============

todo list:
all


Installation
============


Example in your ``config.yml``:

            iga_bootstrap:
                data: %kernel.root_dir%/../src/Iga/NewsBundle/Resources/config/
       



Usage
============

There is a helper for twig templating. 

Topbar
------------
		
		{{ bootstrap_toolbar({ 'title' : 'My project' , 'links' : { 'ManyFew' : 'http://www.many-few.com' , 'Acme' : 'http://acme.com' } }) }}