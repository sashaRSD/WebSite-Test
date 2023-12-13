
var cvs = document.getElementById("canvas");
var ctx = cvs.getContext("2d");

var ship = new Image();
var glava = new Image();
var fon = new Image();
var zem = new Image();

ship.src = "file/vrag.png";
glava.src = "file/glava2.png";
fon.src = "file/fon.png";
zem.src = "file/zem2.png";

var endzv = new Audio();
var zv = new Audio();
var game = new Audio();
endzv.src = "file/endzv.mp3"
zv.src = "file/zv.mp3"
game.src = "file/game.mp3"

document.addEventListener("keydown", moveUp);
	function moveUp(){
if(yPos > 250)
yPos -= 410;
}
document.addEventListener("keydown", reload);
	function reload(){
	if(dead != 0){
location.reload(); endzv.pause();}
}


var dead =0;
var score =0;
var time =0;
var xPos =150;
var yPos =530;
var yGen = 530;
var grav=5;
var step=5;

var pipe = [];
pipe[0] = {
	x : cvs.width,
	y: yGen,
	chisl: Math.floor(Math.random() * 1440)
}


	function draw(){
game.play();
time++;
ctx.drawImage(fon, 0, 0, 1440, 750 );
ctx.drawImage(zem, 0,680, 1440, 70);
ctx.drawImage(glava, xPos ,yPos, 150, 150);
	if (yPos < yGen)
	yPos += grav;

for(var i=0; i<pipe.length; i++){
	ctx.drawImage(ship, pipe[i].x ,pipe[i].y , 150, 150);
	if((pipe[i].x - pipe[i].chisl) > -1 && (pipe[i].x - pipe[i].chisl) < step){
		pipe.push({
		x: cvs.width,
		y: yGen ,
		chisl: Math.floor(Math.random() * 1440)
		});
	}
	if(xPos -pipe[i].x > -1 && xPos-pipe[i].x < step){
	score++; zv.play();
	if(score==step) {step+=5;grav+=2;}}

	pipe[i].x -= step;
	
	if ( yPos-pipe[i].y>-80 && xPos-pipe[i].x >-140 && xPos-pipe[i].x < 140){
	dead++; game.pause(); endzv.play(); sleep(5000);}
}
	ctx.fillStyle == "#000";
	ctx.font = "40px Verdana";
	ctx.fillText("Счет: "+score, 650, 50);
	ctx.fillStyle == "#000";
	ctx.font = "25px Verdana";
	ctx.fillText("Время: "+time, 0, 50);
	if(dead == 0){
	requestAnimationFrame(draw);}
}
zem.onload = draw;

function sleep(ms) {
ms += new Date().getTime();
while (new Date() < ms){}
} 