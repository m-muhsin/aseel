jQuery( function( $ ) {

	//----------------------------------------
	// The magic
	//----------------------------------------

	$( 'form' ).submit( function(e) {
        // e.preventDefault();
        // alert('sad');
		var _this  = $( this );
		var url    = _this.attr( 'action' );
		var method = _this.attr( 'method' );
		var data   = _this.serializeArray();
		var btn    = _this.find( 'button[type="submit"]' );
		var modal  = $( '#modalResponse' );

        console.log(_this);
        console.log(url);
        console.log(method);
        console.log(data);
        console.log(btn);
        console.log(modal);

		btn.prop( { 'disabled' : true } );

		$.ajax( {
		    url: url,
		    method: method,
		    beforeSend: function ( xhr ) {
		        xhr.setRequestHeader( 'X-WP-Nonce', WP_API_Settings.nonce );
		    },
		    data: data,
		    dataType: 'json',
		} ).always( function ( data ) {
			btn.removeProp( 'disabled' );
			modal.find( '.modal-body' ).html( '<pre>' + JSON.stringify( data, null, "\t" ) + '</pre>' );
			modal.modal( 'show' );
		} );

		return false;
	} );

} );