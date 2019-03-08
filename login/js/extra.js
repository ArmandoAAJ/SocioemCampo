function abrirextra(valor,valor1) {
    var xmlRequest = new XMLHttpRequest();
    var url = valor+'?var='+valor1;

    xmlRequest.onreadystatechange = function() {
        if (this.readyState == 1) {
            document.getElementById("conteudo_extra").innerHtml = "<imgsrc='loader.gif' alt='carregando' />";
        }

        if (this.readyState == 4) {
            // Typical action to be performed when the document is ready:
            document.getElementById("conteudo_extra").innerHTML = xmlRequest.responseText;
        }
    };

    xmlRequest.open("GET", url, true);
    xmlRequest.send(null);
}
