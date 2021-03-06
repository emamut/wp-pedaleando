<?php get_header(); ?>

<div class="grid grid-cols-12 mb-4">
  <div class="col-start-1 md:col-start-3 col-span-full md:col-span-9 px-3 md:px-0">
    <h1 class="text-5xl my-4 text-center font-sansita"> Pedaleando <i class="fas fa-bicycle fa-xs"></i> Bike Store</h1>

    <p class="text-base leading-7 mt-5">¡Hola! Esta es la primera tienda online de bicicletas del país.</p>

    <h4 class="text-xl bold font-sansita mt-4">¿Cómo usar?</h4>
    <ul class="list-disc mt-2">
      <li>Agrega al <span class="font-bold">Carrito de Compras</span> la bicicleta que necesites para hacer deporte, ir al trabajo o simplemente para <span class="italic">lamparosear</span>.</li>
      <li>Igualmente, agrega los accesorios que necesites (No te olvides del casco).</li>
      <li>Haz click en <span class="font-bold">Comprar</span>, esto abrirá tu Whatsapp donde te pondremos en contacto con nuestro equipo de ventas. Con ellos debes coordinar el forma de pago (Efectivo, Transferencia, Separado, <span class="italic">CrediCuerpo</span> o <span class="italic">ForniCard</span> <i class="far fa-smile"></i>).</li>
      <li>Espera en 3 días laborales tu pedido en casa <span class="italic">o en la segunda <i class="far fa-grin-wink"></i></span></li>
    </ul>
  </div>
  <div class="col-start-1 md:col-start-3 col-span-full md:col-span-9 px-3 md:px-0 mt-5">
    <button class="btn-buy" :class="enableOrder()" @click="checkOrder">
      Artículos en su carrito: {{ orderArray.length }}
    </button>
  </div>
</div>

<order-component :order-array="orderArray"></order-component>

<div class="grid grid-cols-12" v-for="(items, key) in stockArray">
  <div class="col-span-full px-10 mt-8 mb-3">
    <h3 class="text-3xl font-sansita">{{ key }}</h3>
  </div>

  <card-component v-for="item in items" :item="item" :key="item.ID"></card-component>
</div>

<?php get_footer() ?>