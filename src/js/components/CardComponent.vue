<template>
  <div class="col-span-full md:col-span-4 bg-gray-300 p-3 m-1">
    <img :src="item.post_image" alt="" class="w-full" />
    <p class="text-xl text-center font-bold">
      {{ item.post_title }}
    </p>
    <p class="text-sm mt-2">{{ item.text }}</p>
    <div class="flex justify-between mt-3 flex-wrap">
      <p class="font-bold text-2xl mt-3">${{ item.prize }}</p>
      <button class="btn-buy">Comprar</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      numOrders: [],
    };
  },
  props: ['item', 'arrayKey'],
  mounted() {
    for (let cont = 0; cont < this.$parent.stockArray.length; cont++)
      this.numOrders[cont] = 0;
  },
  methods: {
    addToOrder: function(item, key) {
      let search = this.$parent.orderArray.findIndex((e) => e.id == item.ID);
      if (search == -1) {
        if (this.numOrders[key] > 0)
          this.$parent.orderArray.push({
            id: item.ID,
            name: item.post_title,
            prize: item.prize,
            quantity: this.numOrders[key],
          });
      } else this.$parent.orderArray[search].quantity = this.numOrders[key];
      this.$parent.sumOrder = this.$parent.orderArray.reduce(
        (accum, item) => accum + item.prize * item.quantity,
        0
      );
    },
  },
};
</script>
