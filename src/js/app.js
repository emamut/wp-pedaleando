import Vue from 'vue';
import axios from 'axios';

Vue.component(
  'card-component',
  require('./components/CardComponent.vue').default
);

const app = new Vue({
  el: '#app',
  data() {
    return {
      stockArray: {},
    };
  },
  mounted: function() {
    let self = this;
    axios.get(siteURL + '/wp-json/bikes/v1/get').then(function(response) {
      self.stockArray = response.data;
    });
  },
});
