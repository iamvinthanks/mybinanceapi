<div class="iphone">
  <form class="form">
    <div>
      <h2>Convert Binance Gift Code</h2>

      <!-- <div class="card">
        <address>
          Adam Johnson<br />
          403 Oakland Ave Street, A city, Florida, 32104,<br />
          United States of America
        </address>
      </div> -->
    </div>

    <fieldset>
      <legend>Redeem Code</legend>

      <div class="form__radios" id="form">
        <div class="form__radio">
        <input type="text" name="Refrence Number" placeholder="Refrence Number" required class="form-control" id="referenceNo" required></input>
        </div>

        <div class="form__radio">
        <input type="text" name="cardNumber" placeholder="Binance Gift Code" class="form-control" id="giftcode"   ></input>
        </div>

        <div class="form__radio">
        <input type="text" class="form-control" placeholder="Nomor Rekening/E-Wallet" aria-label="Text input with dropdown button" id="recipient_account">
        </div>
        <div class="form__radio">
        <input type="text" class="form-control" placeholder="Your card number" aria-label="Text input with dropdown button" id="recipient_account">
        </div>
      </div>
    </fieldset>

    <alert>
        <div class="loading" id="loading" style="display:none">
            <div class="dot dot1"></div>
            <div class="dot dot2"></div>
            <div class="dot dot3"></div>
            <div class="dot dot4"></div>
            <div class="dot dot5"></div>
            <div class="dot dot6"></div>
            
        </div>
      
  </alert>
    <div>
      <button class="button button--full" type="button" id="btn_ref">Verif Code</button>
    </div>
    <div>
        <button class="button button--full" type="button" id="redeem" style="display:none">Redeem</button>
    </div>
  </form>
 
</div>



<style>
    @use postcss-preset-env {
  stage: 0;
}
:root {
  --color-background: #fae3ea;
  --color-primary: #fc8080;
  --font-family-base: Poppin, sans-serif;
  --font-size-h1: 1.25rem;
  --font-size-h2: 1rem;
}


* {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
}

body {
  background-color: var(--color-background);
  display: grid;
  font-family: var(--font-family-base);
  line-height: 1.5;
  margin: 0;
  min-block-size: 100vh;
  padding: 5vmin;
  place-items: center;
}

address {
  font-style: normal;
}

button {
  border: 0;
  color: inherit;
  cursor: pointer;
  font: inherit;
}

fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}

h1 {
  font-size: var(--font-size-h1);
  line-height: 1.2;
  margin-block: 0 1.5em;
}

h2 {
  font-size: var(--font-size-h2);
  line-height: 1.2;
  margin-block: 0 0.5em;
}

legend {
  font-weight: 600;
  margin-block-end: 0.5em;
  padding: 0;
}

input {
  border: 0;
  color: inherit;
  font: inherit;
}

input[type="radio"] {
  accent-color: var(--color-primary);
}

table {
  border-collapse: collapse;
  inline-size: 100%;
}

tbody {
  color: #b4b4b4;
}

td {
  padding-block: 0.125em;
}

tfoot {
  border-top: 1px solid #b4b4b4;
  font-weight: 600;
}

.align {
  display: grid;
  place-items: center;
}

.button {
  align-items: center;
  background-color: var(--color-primary);
  border-radius: 999em;
  color: #fff;
  display: flex;
  gap: 0.5em;
  justify-content: center;
  padding-block: 0.75em;
  padding-inline: 1em;
  transition: 0.3s;
}

.button:focus,
.button:hover {
  background-color: #e96363;
}

.button--full {
  inline-size: 100%;
}

.card {
  border-radius: 1em;
  background-color: var(--color-primary);
  color: #fff;
  padding: 1em;
}

.form {
  display: grid;
  gap: 1em;
}

.form__radios {
  display: grid;
  gap: 1em;
}

.form__radio {
  align-items: center;
  background-color: #fefdfe;
  border-radius: 1em;
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
  display: flex;
  padding: 1em;
}

.form__radio label {
  align-items: center;
  display: flex;
  flex: 1;
  gap: 1em;
}


.icon {
  block-size: 1em;
  display: inline-block;
  fill: currentColor;
  inline-size: 1em;
  vertical-align: middle;
}

.iphone {
margin: 0 auto;
  background-color: #fbf6f7;
  background-image: linear-gradient(to bottom, #fbf6f7, #fff);
  border-radius: 2em;
  /* block-size: 812px; */
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
  inline-size: 375px;
  overflow: auto;
  padding: 2em;
}
@media (max-width: 800px) {
  .iphone {
    inline-size: 300px;
    /* height: 500px; */
  }
}
</style>