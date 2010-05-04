from django.conf.urls.defaults import *
from django.conf import settings

from django.contrib import admin
admin.autodiscover()

urlpatterns = (
    (r'^$', 'dict.views.main'),
    (r'^dic/(?P<lang>.*)/$', 'dict.views.dict'),
    (r'^m/(?P<lang>.*)/$', 'dict.views.m'),
    (r'^from_phonetic/(?P<lang>.*)/(?P<word>.*)$', 'dict.views.from_phonetic'),
    (r'^from_english/(?P<lang>.*)/(?P<word>.*)$', 'dict.views.from_english'),
    (r'^from_radical/(?P<lang>.*)/(?P<char>.*)/(?P<strokes>.*)$', 'dict.views.from_radical'),
    (r'^from_char/(?P<lang>.*)/(?P<char>.*)$', 'dict.views.from_char'),
    (r'^char/(?P<lang>.*)/(?P<char>.*)/(?P<level>.*)$', 'dict.views.char'),
    (r'^word/(?P<lang>.*)/(?P<word_id>.*)$', 'dict.views.word'),
    (r'^quiz/(?P<level>.*)$', 'dict.views.quiz'),
    (r'^quiz_save_score/(?P<score>.*)$', 'dict.views.quiz_save_score'),
    (r'^quiz_save_level/(?P<level>.*)$', 'dict.views.quiz_save_level'),
    (r'^xd_receiver.html$', 'dict.views.xd_receiver'),
    (r'^admin/', include(admin.site.urls)),
)

if settings.DEBUG:
    urlpatterns += (
        (r'^media/(?P<path>.*)$', 'django.views.static.serve', {'document_root': settings.MEDIA_ROOT}),
    )

urlpatterns = patterns('', *urlpatterns)
