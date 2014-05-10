/* sunrise.js - draw some suns
 *
 * Chris Meyers, 11 March 2014
 */

"use strict";

/* Load the Factors from the JSON file.
 */
var suninfo;
function saveReturn(data)
{
    suninfo = JSON.parse(data);
}

function drawSuns()
{
    var x;
    var y;

    ajaxFetch("./sun.cgi", saveReturn);
    // "suninfo" now an array full of info

    var canvas = document.getElementById('sungraph');
    var context = canvas.getContext('2d');
    // arc takes centerX, centerY, radius, (those obvious)
    //           startangle, endangle, (for drawing arcs)
    //           counterclockwise (true or false)

    for (var i = 0; i < suninfo.SunInfo.length; i++) {

        // sunrise
        x = i * 10;
        y = 360 - (suninfo.SunInfo[i].rise / 4);
	makeSun("rise");

        // sunset
        y = 360 - (suninfo.SunInfo[i].set / 4);
        makeSun("set");
    }

    function makeSun(time){
	context.beginPath();
        context.arc(x, y, 3, 0, Math.PI * 2, true);
        context.closePath();
	if(time === "set"){
            context.strokeStyle = "#EE9A00";
            context.fillStyle = "#EE9A00";
	}
	else{
	    context.strokeStyle = "#FFCC00";
            context.fillStyle = "#FFCC00";
	}
        context.stroke();
        context.fill();
    }
}
