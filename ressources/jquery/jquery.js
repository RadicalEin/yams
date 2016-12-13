/**
 * Created by clement on 25/11/16.
 */

$("#relanceRr").click(function(){
    $.ajax({
        url : 'Action-RelancEer', // La ressource ciblée
        type : 'GET', // Le type de la requête HTTP
        /**

         * Le paramètre data n'est plus renseigné, nous ne faisons plus passer de variable

         */
        dataType : 'html', // Le type de données à recevoir, ici, du HTML.
        success :function(code_html, statut) { // code_html contient le HTML renvoyé
            $("#des").html(code_html);
        }
    });
});

$("#lancRer").click(function(){
    $.ajax({
        url : 'Action-Jouer',
        type : 'GET',
        datatype : 'html',
        success :  function(code_html, statut) {
            $("#des").html(code_html);
        }
    });
});