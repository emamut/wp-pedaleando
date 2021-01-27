<template>
  <div class="col-span-full md:col-span-4 bg-gray-300 p-3 m-1">
    <img :src="item.post_image" alt="" class="w-full" />
    <p class="text-xl text-center font-bold">
      {{ item.post_title }}
    </p>
    <p class="text-sm mt-2">{{ item.text }}</p>
    <div class="flex justify-between mt-3 flex-wrap">
      <p class="font-bold text-2xl mt-3">${{ item.prize }}</p>
      <input
        type="number"
        class="border-2 bg-white rounded ml-4 px-2 w-16"
        min="0"
        max="100"
        v-model="cant"
        placeholder="0"
      />
      <button class="btn-buy" @click="addToOrder(item)">
        Comprar
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      numOrders: [],
      cant: 0,
    };
  },
  props: ['item'],
  methods: {
    addToOrder: function(item) {
      if (this.cant > 0) {
        let search = this.$parent.orderArray.findIndex((e) => e.ID == item.ID);
        if (search == -1) {
          item.quantity = this.cant;
          this.$parent.orderArray.push(item);
        } else this.$parent.orderArray[search].quantity = this.cant;
        this.$parent.sumOrder = this.$parent.orderArray.reduce(
          (accum, item) => accum + item.prize * item.quantity,
          0
        );
      }
    },
  },
};
</script>
