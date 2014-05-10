#!/usr/bin/perl -w

#Three Comic Screen Scrape
#Written by Chris Meyers

use strict;
use CGI;
use WWW::Mechanize;
use HTML::TokeParser;

my $agent = WWW::Mechanize->new();
$agent->get("http://www.gocomics.com/garfield");

my $stream = HTML::TokeParser->new(\$agent->{content});

#--------CARTOON 1
#initital div
my $tag = $stream->get_tag("p");

#loop to find comic div
while($tag->[1]{class} and $tag->[1]{class} ne 'feature_item'){
    $tag = $stream->get_tag("p");
}

#go to div
$tag = $stream->get_tag("div");

#get comic image
my $comic = $stream->get_tag("img");

#info for comic
my $source = $comic->[1]{'src'};

my $cgi = new CGI;

print $cgi->header(-type=>'text/html'),
      $cgi->start_html('Comic Screen Scrape');

#print $cgi->h1('Garfield');

print $cgi->img({src=>$source, alt=>'Garfield'}), "\n\n";
print $cgi->p();

#--------CARTOON 2
$agent->get("http://dilbert.com/fast");
$stream = HTML::TokeParser->new(\$agent->{content});

$tag=$stream->get_tag("img");
$comic=$stream->get_tag("img");
$source = $comic->[1]{'src'};
#print cgi->h1('Dilbert');
print $cgi->img({src=>"http://www.dilbert.com".$source, alt=>'Dilbert'}),"\n\n";
print $cgi->p();

#--------CARTOON 3
$agent->get("http://xkcd.com");
$stream = HTML::TokeParser->new(\$agent->{content});

$tag=$stream->get_tag("div");
while($tag->[1]{id} and $tag->[1]{id} ne 'comic'){
    $tag = $stream->get_tag("div");
}

$comic = $stream->get_tag("img");
$source = $comic->[1]{'src'};
#print cgi->h1('XKCD');
print $cgi->img({src=>$source, alt=>'xkcd'}),"\n\n";

print <<END_OF_VALIDATION_CODE;
<p>
    <a href="http://validator.w3.org/check?uri=referer">
    <img src="http://www.w3.org/Icons/valid-xhtml10"
         alt="Valid XHTML 1.0 Transitional"
         height="31" width="88" /></a>
</p>
END_OF_VALIDATION_CODE

print $cgi->end_html, "\n";
