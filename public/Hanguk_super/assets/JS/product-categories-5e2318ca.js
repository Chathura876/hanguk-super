import{n as a,w as d}from"./nouislider-abb1ebb1.js";var e=document.getElementById("product-price-range");if(e){a.create(e,{start:[10,30],step:10,margin:10,connect:!0,behaviour:"tap-drag",range:{min:0,max:100},format:d({decimals:0,prefix:"$ "})});var i=document.getElementById("minCost"),r=document.getElementById("maxCost");e.noUiSlider.on("update",function(n,t){t?r.value=n[t]:i.value=n[t]}),i.addEventListener("change",function(){e.noUiSlider.set([null,this.value])}),r.addEventListener("change",function(){e.noUiSlider.set([null,this.value])})}