import sys
sys.path = ['/django-1.1/django-trunk','/django-1.1','/usr/lib/python2.5','/usr/lib/python-support','/django','/django-1.1/fb'] + sys.path
import os

os.environ['DJANGO_SETTINGS_MODULE'] = 'fb.settings'
       
import django.core.handlers.wsgi
application = django.core.handlers.wsgi.WSGIHandler()

