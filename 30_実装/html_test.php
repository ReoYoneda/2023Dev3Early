<input type="radio" name="rating" id="rating1" value="1" onchange="changeLabel(this)">
<label for="rating1" id="label1">☆☆☆☆☆</label>

<input type="radio" name="rating" id="rating2" value="2" onchange="changeLabel(this)">
<label for="rating2" id="label2">☆☆☆☆☆</label>

<input type="radio" name="rating" id="rating3" value="3" checked onchange="changeLabel(this)">
<label for="rating3" id="label3">☆☆☆☆☆</label>

<input type="radio" name="rating" id="rating4" value="4" onchange="changeLabel(this)">
<label for="rating4" id="label4">☆☆☆☆☆</label>

<input type="radio" name="rating" id="rating5" value="5" onchange="changeLabel(this)">
<label for="rating5" id="label5">☆☆☆☆☆</label>

<script>
  function changeLabel(radio) {
    var labelId = "label" + radio.value;
    var label = document.getElementById(labelId);
    var ratings = ["★☆☆☆☆", "★★☆☆☆", "★★★☆☆", "★★★★☆", "★★★★★"];

    if (label) {
      label.textContent = ratings[radio.value - 1];
    }
  }
</script>