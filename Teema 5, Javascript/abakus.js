window.onload = function(){
	var parlid = document.getElementsByClassName("bead");
	for (var i = 0; i < parlid.length; i++) {	
		var temp = parlid[i];
		temp.onclick = function() {
			if (this.style.cssFloat == "right"){
				this.style.cssFloat = "left";
			} else {
				this.style.cssFloat = "right";
			}			
		}	
	}
	
}