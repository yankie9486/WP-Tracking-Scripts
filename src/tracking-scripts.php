<?php

class Tracking_Scripts
{
    private $options;
    public function __construct()
    {
        $this->options = new Tracking_Scripts_Options();
        add_action('wp_head', [$this, 'google_analytics_tag'], 10);
        add_action('wp_head', [$this, 'facebook_tag'], 10);
        add_action('wp_head', [$this, 'inspectlet_tag'], 10);
    }


    public function google_analytics_tag()
    {
        $code = $this->options->get_option('google_code');

        if ($code) {
            ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $code; ?>"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo $code; ?>');
        </script>

<?php
        }
    }

    public function facebook_tag()
    {
        $code = $this->options->get_option('facebook_code');

        if ($code) {
            ?>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $code; ?>');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=<?php echo $code; ?>&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

<?php
        }
    }
    public function inspectlet_tag()
    {
        $code = $this->options->get_option('inspectlet_code');

        if ($code) {
            ?>

<!-- Begin Inspectlet Asynchronous Code -->
<script type="text/javascript">
(function() {
window.__insp = window.__insp || [];
__insp.push(['wid', <?php echo $code; ?>]);
var ldinsp = function(){
if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=<?php echo $code; ?>&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 0);
})();
</script>
<!-- End Inspectlet Asynchronous Code -->

<?php
        }
    }
}
