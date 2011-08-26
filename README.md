This bundle is under early development stage.
============

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

Topbar
------------
		
		{{ bootstrap_toolbar({ 'title' : 'My project' , 'links' : { 'ManyFew' : 'http://www.many-few.com' , 'Acme' : 'http://acme.com' } }) }}