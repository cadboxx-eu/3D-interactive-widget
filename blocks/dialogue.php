<span class="patent-pending">Patent Pending</span>

<!-- External HTML overlay, hidden by default, will show over the Aframe canvas -->
<div class="dialogue">
  <div class="dialogue__closer"></div>
  <div class="dialogue__text">
    <div class="dialogue__closerX"></div>
    <div class="dialogue__wrapper">
      <div class="dialogue__inner">
        <h2 class="dialogue__headline">Headline</h2>
        <div class="dialogue__content">Headline</div>
      </div>
    </div>
  </div>
</div>

<!-- Right now spaces live in different files, this element is used to hide the transition -->
<div class="frame-blend-overlay">
</div>

<script>
  var dialogueInformation = {
    desk_drawer:{
      title: 'Pull-out Desk',
      content: 'Work on your laptop, do homework, or eat meals on this desk on a pull-out track.',
    },
    cooler_drawer:{
      title: 'Insulated Beverage Drawer',
      content: 'Store Drinks and Snacks in a First-of-its-Kind Insulated Pod Drawer – WOW!!',
    },
    curtain:{
      title: 'Designer Privacy Curtain',
      content: 'Curtain Curated by Interior Designer for Pod Privacy on a Seamless Track with Heavy Fabric to Cut out Noise.',
    },
    charging:{
      title: 'USB, HDMI, Built-in Charging Ports',
      content: 'USB, HDMI, and Power Plugs Galore for Electronics Charging, Game Consoles, and Accessories.',
    },
    connectivity:{
      title: 'Connectivity',
      content: 'With TV, Bluetooth Lighting Controls, Wireless Charging, Bluetooth, and Wireless Headphone Connectivity, You Have it All.',
    },
    bluetooth:{
      title: 'Wireless Bluetooth Headphone Connectivity',
      content: 'Wireless Bluetooth Headphone Connectivity on each side of Pod',
    },
    bed:{
      title: 'Full Size Memory Foam Bed',
      content: 'Full Size Bed with Memory Foam Mattress Included',
    },
    television:{
      title: '50" Multimedia TV & AppleTV',
      content: 'Huge Personal Screen for Plug and Play TV/Computer, including AppleTV for each screen—allowing for Private, Wireless, Bluetooth Headphone Connections in Your Separate Pods.',
    },
    headboard:{
      title: 'Designer Cushioned Headboard',
      content: 'Floor-to-Ceiling, Plush, Leather Designer Headboards.',
    },
    wireless:{
      title: 'Wireless Smart Device Charging Port',
      content: 'Wirelessly charge your phone on this invisible, built-in phone charger.',
    },
    lighting:{
      title: 'Bluetooth Lighting Control',
      content: 'Control Lighting and Even Adjust the Mood with Color Lights Independently in Each Pod.',
    },
     clothes_drawer_outside:{
      title: 'Clothing Storage',
      content: 'Generous Drawer/Storage Space Built into your Pod',
    },
    curtain_outside:{
      title: 'Designer Privacy Curtain',
      content: 'Curtain Curated by Interior Designer for Pod Privacy on a Seamless Track with Heavy Fabric to Cut out Noise.',
    },
    bluetooth_outside:{
      title: 'Wireless Bluetooth Headphone Connectivity',
      content: 'Wireless Bluetooth Headphone Connectivity on each side of Pod',
    },
    headboard_outside:{
      title: 'Designer Cushioned Headboard',
      content: 'Floor-to-Ceiling, Plush, Leather Designer Headboards.',
    },
    lighting_outside:{
      title: 'Bluetooth Lighting Control',
      content: 'Control Lighting and Even Adjust the Mood with Color Lights Independently in Each Pod.',
    },
  };

  // Dialogue close click listener
  var closerels = document.querySelectorAll(".dialogue__closer");
    for(var c=0; c<closerels.length; c++){
    closerels[c].addEventListener('click', function(){
      aframeInteractions.toggleDialoge();
    });
  }


  // listens until the main sky is loaded
  // not currently used, but maybe useful!
  var mainsky = document.getElementById("mainsky");
  mainsky.addEventListener('materialtextureloaded', function () {
    // Small timeout just in case?
    setTimeout(function () {
      console.log('loaded!');
    }, 100);
  });



</script>