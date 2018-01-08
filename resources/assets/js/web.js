var uFilter = 
[

{ vendorId: 9025, productId: 67 },

];

var device = '';

var id = '';

var t = '';

var isPaused = false;

var btnConnect = $('#btn-connect');


$(document).ready(function () {

  btnConnect.prop('disabled', true);

  if (navigator.usb) {

    checkInterval();

    navigator.usb.addEventListener('connect', async e => {

      console.log('Connect');

      bindDevice(e.device);

    });


    navigator.usb.getDevices({ filters: uFilter })
    .then(devices => {

      if (devices.length) {

        devices.forEach(device_ => {

          bindDevice(device_);

          checkInterval();

        });

      } else {

        isPaused = true;

        console.log('No devices');

      }

    })

  }

}); // end document ready


function connect() {

  isPaused = false;

  navigator.usb.requestDevice({ filters: uFilter })
  .then(device_ => {

    checkInterval();

    device = device_;

    bindDevice(device_);

  })
  .catch(error => {

    isPaused = true;

    console.log('Error Connect: ', error.message);

  });

} // end function connect


function checkInterval() {

  t = setInterval(function () {

    if (!isPaused) {

      checkConnect();

    }

  }, 100);

} // end function checkInterval


function checkConnect() {

  navigator.usb.addEventListener('connect', async e => {

    console.log('Connect');

    bindDevice(e.device);
    
  });


  navigator.usb.getDevices({ filters: uFilter }).then(devices => {

    if (devices.length) {

      devices.forEach(device_ => {

        bindDevice(device_);

      });

    } else {

      isPaused = true;

      console.log('checkConnect: No devices');

    }

  });

} // end checkConnect


if (navigator.usb) {

  navigator.usb.addEventListener('disconnect', async e => {

    isPaused = true;

    console.log('Disconnect');

  });


  navigator.usb.addEventListener('connect', async e => {

    console.log('Connect');

    isPaused = false;

    bindDevice(e.device);

  });


  navigator.usb.getDevices({ filters: uFilter })
  .then(devices => {

    devices.forEach(device_ => {

      bindDevice(device_);

    });

  });

}


function bindDevice(_device) {

  device = _device;

  _device

  .open()

  .then(() => {
    if (device.configuration === null) {

      return device.selectConfiguration(1);

    }
  })

  .then(() => {

    device.claimInterface(device.configuration.interfaces[0].interfaceNumber)

  })

  .then(() => { 

    getRfid();

  })

  .catch(err => {

    console.error("USB Error", err);

  });

} // end function bindDevice


function getRfid() {

  const { endpointNumber, packetSize } = device.configuration.interfaces[0].alternate.endpoints[0];

  device
  .transferIn(endpointNumber, packetSize)

  .then(result => {

    console.log(result);

    let decoder = new TextDecoder();

    console.log('Received: ' + decoder.decode(result.data));

  })
  .catch(err => {

    // isPaused = true;
    console.error("USB Read Error", err);

  });

} // end function getRfid 
