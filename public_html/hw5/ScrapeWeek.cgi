#!/usr/bin/perl -w

#Week Screen Scrape
#Written by Chris Meyers

use strict;
use CGI;
use WWW::Mechanize;
use HTML::TokeParser;
use DateTime;

my $date = DateTime->now;
my $numDays = 0;

while ( $date->day_of_week != 7 ) {
    $date->subtract( days => 1 );
    $numDays++;
}

my $target = sprintf("%d/%02d/%02d",
                     $date->year(), $date->month(), $date->day() );

my $cgi = new CGI;

sub getNextComic{
    my $agent = WWW::Mechanize->new();

    $agent->get("http://www.gocomics.com/garfield/" . $target);
    
    my $stream = HTML::TokeParser->new(\$agent->{content});

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

    #make html
    print $cgi->p($target);

    print $cgi->img({src=>$source, alt=>'Garfield'}), "\n\n";
    
    print $cgi->p();
}

print $cgi->header(-type=>'text/html'),$cgi->start_html('Week Screen Scrape');
print $cgi->h1("Garfield");

while($numDays >= 0){
    getNextComic();
    $target = $date->add( days => 1 );
    $target = sprintf("%d/%02d/%02d",
                  $date->year(), $date->month(), $date->day() );
    $numDays--;
    #print $cgi->p($target);
}

print <<END_OF_VALIDATION_CODE;
<p>
    <a href="http://validator.w3.org/check?uri=referer">
    <img src="http://www.w3.org/Icons/valid-xhtml10"
         alt="Valid XHTML 1.0 Transitional"
         height="31" width="88" /></a>
</p>
END_OF_VALIDATION_CODE

print $cgi->end_html, "\n";
