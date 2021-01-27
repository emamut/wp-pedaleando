import Vue from 'vue';
import axios from 'axios';

Vue.component(
  'card-component',
  require('./components/CardComponent.vue').default
);

Vue.component(
  'order-component',
  require('./components/OrderComponent.vue').default
);

const app = new Vue({
  el: '#app',
  data() {
    return {
      stockArray: {},
      orderArray: [],
      sumOrder: 0,
      hideOrder: true,
    };
  },
  mounted: function() {
    let self = this;
    axios.get(siteURL + '/wp-json/bikes/v1/get').then(function(response) {
      self.stockArray = response.data;
    });
  },
  methods: {
    enableOrder: function() {
      if (this.orderArray.length == 0) return 'opacity-50 cursor-not-allowed';
    },
    checkOrder: function() {
      if (this.orderArray.length > 0) this.hideOrder = false;
    },
  },
});
