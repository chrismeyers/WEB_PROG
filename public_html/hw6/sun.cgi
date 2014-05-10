#! /usr/bin/perl -w

#Sunrise and Sunset grapher
#Written by Chris Meyers

use lib '/opt/kilroy/lib/perl';
use Astro::Sunrise;
use DateTime;
use CGI qw/:standard/;

my $date = DateTime->now;
my $num_days_forward = 0;
my @risetimes = ();
my @settimes = ();
my @dates = ();

$date->subtract(days => 14);

#make JSON
print "Content-Type: application/json\n\n";

print '{
"SunInfo" : [
';


#get and store data for sunrise/sets
while($num_days_forward <= 28){
    ($risetimes[$num_days_forward],$settimes[$num_days_forward]) = 
	sunrise($date->year(),$date->month(),$date->day(),-75.12643, 39.70057, -5,0); 
    
    $dates[$num_days_forward] = 
	sprintf("%02d %s %d", $date->day(), $date->month_abbr(), $date->year());

    # convert to minutes from midnight
    ($sunrisehours, $sunrisemins) = split(":",$risetimes[$num_days_forward]);
    ($sunsethours, $sunsetmins) = split(":",$settimes[$num_days_forward]);

    #print 'the day is ' . $num_days_forward . "\n";
    print " {\n";
    print '    "date": "' . $dates[$num_days_forward] . '",' . "\n";
    print '    "rise": "' . ($sunrisehours * 60 + $sunrisemins) . '",' . "\n";
    print '    "set":  "' . ($sunsethours * 60 + $sunsetmins) . '"' . "\n";
    if($num_days_forward != 28){
	print " },\n";
    }
    else{
	print " }\n";
    }
    
    $num_days_forward++;
    $date->add(days => 1);
}


print ']
}
';
