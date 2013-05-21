import sys
sys.path = ['/data/hosting/lunasys/r5/', '/usr/lib/python2.5','/usr/lib/python-support','/data/hosting','/data/hosting/fb'] + sys.path
import os

os.environ['DJANGO_SETTINGS_MODULE'] = 'fb.settings'
       
import django.core.handlers.wsgi
application = django.core.handlers.wsgi.WSGIHandler()

