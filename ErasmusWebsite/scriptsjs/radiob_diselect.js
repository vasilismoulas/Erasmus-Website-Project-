function deselectRadio(radio) {
    if (radio.previousValue === radio.value) {
      radio.checked = false;
      radio.previousValue = null;
   } else {
      radio.previousValue = radio.value;
    }
  }