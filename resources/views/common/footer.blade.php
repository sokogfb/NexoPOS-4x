<?php

use App\Services\Options;
use Illuminate\Support\Facades\Cookie;

$options            =   app()->make( Options::class );

$authentication     =   [
    'token'         =>  Cookie::get( 'ns_token' ),
    'csrf'          =>  csrf_token()
];

$json               =   [
    'ns_currency_symbol'                =>  $options->get( 'ns_currency_symbol', '$' ),
    'ns_currency_iso'                   =>  $options->get( 'ns_currency_iso', 'USD' ),
    'ns_currency_position'              =>  $options->get( 'ns_currency_position', 'before' ),
    'ns_currency_thousand_separator'    =>  $options->get( 'ns_currency_thousand_separator', ',' ),
    'ns_currency_decimal_separator'     =>  $options->get( 'ns_currency_decimal_separator', '.' ),
    'ns_currency_precision'             =>  $options->get( 'ns_currency_precision', '2' ),
    'ns_currency_prefered'              =>  $options->get( 'ns_currency_prefered', 'iso' ),
];
?>
<script type="text/javascript">
ns.currency         =   @json( $json );
ns.authentication   =   @json( $authentication );
ns.base_url         =   '{{ url( "/" ) }}';
</script>
<script src="{{ asset( 'js/manifest.js' ) }}"></script>
<script src="{{ asset( 'js/vendor.js' ) }}"></script>
<script src="{{ asset( 'js/bootstrap.js' ) }}"></script>
<script src="{{ asset( 'js/popups.js' ) }}"></script>
@yield( 'layout.dashboard.footer.inject' )
