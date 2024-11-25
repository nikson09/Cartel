<template>

  <div class="container">
    <div class="container">
    </div>
    <div v-if="localProducts.length === 0 " class="no-products">
      <p>К сожалению, по вашим фильтрам ничего не найдено.</p>
    </div>
    <div v-else>


      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card text-center" style="border:none">

            <div class="row justify-content-center">
              <div
                  class="col-4  "
                  v-for="product in localProducts"
                  :key="product.id"
              >
                <div class="one-card">
                  <div class="productImageWrapper">
                    <div
                        class="one-product"
                        :class="{ 'product-has-run-out': product.quantity === 0 }"
                    >
                      <!-- Discount -->
                      <span v-if="product.is_sales" class="product__discount">
                          -{{ product.discount_percent }}%
                        </span>
                      <span
                          v-if="product.is_sales"
                          class="discount-date"
                      >
                            до {{ product.discount_date }}
                          </span>
                      <span
                          v-else
                          class="discount-none"
                      ></span>

                      <!-- Stock Status -->
                      <img
                          :src="product.quantity > 0 ? '/images/templates/in_stock.png' : '/images/templates/under_the_order.png'"
                          class="product-quantity"
                          alt=""
                      />

                      <!-- Product Image -->
                      <div class="row justify-content-center ">
                        <a :href="`/product/${product.id}`">
                          <img
                              class="image_product"
                              :src="`/storage/products/${product.image}`"
                              width="auto"
                              height="215,783"
                              alt=""
                          />
                        </a>
                      </div>

                      <!-- New Badge -->
                      <img
                          :src="product.quantity > 0 ? '/images/new.png' : ''"
                          v-if="product.is_new "
                          class="new"
                          alt=""
                      />

                      <!--                      &lt;!&ndash; Discount Badge &ndash;&gt;-->
                      <!--                      <span-->
                      <!--                          v-if="product.is_sales"-->
                      <!--                          class="product-discount"-->
                      <!--                      >-->
                      <!--                        -{{ product.discount_percent }}%-->
                      <!--                      </span>-->
                    </div>
                  </div>
                  <div class="ProductInfoBlock">
                    <!-- Product Info -->
                    <div class="text-block ">
                      <p>
                        <a
                            class="main-goods-title"
                            :href="`/product/${product.id}`"
                        >
                          {{ product.name }}
                        </a>
                      </p>
                      <span class="country">
                              <img
                                  v-if="product.country"
                                  class="image-flag lazy"
                                  style="margin-right: 0.3vw;"
                                  :src="`/storage/countries/${product.country.image}`"
                                  alt=""
                              />
                              <a
                                  v-if="product.country"
                                  class="link"
                                  :href="`/country/${product.country.id}/category/${product.category.id}`"
                              >
                                {{ product.country.site_name }} /
                              </a>
                              <a
                                  v-if="product.brand"
                                  :href="`/brand/${product.brand.id}/category/${product.category.id}`"
                              >
                                {{ product.brand.name }}
                              </a>
                            </span>
                    </div>

                    <!-- Product Price and Button -->
<!--                    <div class=" priceBlock " style="width: 50%;">-->

<!--                      <div-->
<!--                          v-if="product.is_sales"-->
<!--                          class="OldPrice"-->
<!--                      >-->
<!--                        {{ product.sum }} <span>грн</span>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <h5 class="CurrentPrice">-->
<!--                          {{ product.is_sales ? product.discount_sum : product.sum }}-->
<!--                          грн-->
<!--                        </h5>-->
<!--                      </div>-->

<!--                    </div>-->
                    <div class="priceBlock">
                      <div class="OldPrice">
                        <span v-if="product.is_sales">{{ product.sum }} грн</span>

                      </div>
                      <div>
                        <h5 class="CurrentPrice">
                          {{ product.is_sales ? product.discount_sum : product.sum }} грн
                        </h5>
                      </div>
                    </div>
                    <div class="button-add">
                      <button
                          class="btn btn-default add-to-cart"
                          @click="addToBasket(product.id)"
                      >
                        <i class="fa fa-shopping-cart"></i>
                        {{ product.quantity > 0 ? 'В корзину' : 'Предзаказ' }}
                      </button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- recommended-items -->

          <!--        pagination block -->
          <div v-if="lastPage > 1" class="pagination-container">
            <button
                @click="changePage(currentPage - 1)"
                :disabled="currentPage <= 1"
                class="pagination-btn prev-btn"
            >
              &#8592;
            </button>

            <span class="pagination-info">
        Page <strong>{{ currentPage }}</strong> of <strong>{{ lastPage }}</strong>
      </span>

            <button
                @click="changePage(currentPage + 1)"
                :disabled="currentPage >= lastPage"
                class="pagination-btn next-btn"
            >
              &#8594;
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>
<style scoped>

.no-products {
  text-align: center;
  font-size: 18px;
  font-weight: 600;
  color: #333;
  margin-top: 20px;
}

/* Общий контейнер */
.pagination-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  gap: 20px;
}

.pagination-btn {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
  display: flex;
  align-items: center;
}

.pagination-btn:disabled {
  background-color: #c6c6c6;
  cursor: not-allowed;
}

.pagination-btn:hover:not(:disabled) {
  background-color: #0056b3;
  transform: scale(1.05);
}

.pagination-info {
  font-size: 16px;
  font-weight: 500;
}

.pagination-info strong {
  font-size: 18px;
  color: #007bff;
}

.prev-btn {
  padding-left: 15px;
}

.next-btn {
  padding-right: 15px;
}


.checkbox-label input:checked + .checkmark {
  background-color: orange;
}

.checkmark::after {
  content: "";
  position: absolute;
  display: none;
}

.checkbox-label input:checked + .checkmark::after {
  display: block;
  left: 7px;
  top: 3px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}

.col-4 {
  margin-bottom: 15px;
}

.one-card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  border: solid 1px white;
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 15px;
  margin-top: 10px;

  height: 100%; /* Устанавливаем фиксированную высоту для всей карточки */
}

.productImageWrapper {
  position: relative;
  height: 215px; /* Фиксированная высота для изображения, чтобы сохранить одинаковый размер */
  overflow: hidden; /* Чтобы картинка не выходила за пределы */
}


.image_product {
  width: 100%; /* На всю ширину колонки */
  height: 200px; /* Фиксированная высота для консистенции */
  object-fit: cover;
  object-position: center; /* Центрирование изображения */


}

/* Прозрачность для товаров, которых нет в наличии */
.product-has-run-out {
  opacity: 0.5;
}

/* Количество товара */
.product-quantity {
  max-width: 50px;
  margin-bottom: 1rem;
  position: absolute;
  top: 70px;
  left: 15px;
}

/* Скидка */
.discount-date {
  position: absolute;
  top: 20px;
  left: 60px;
  display: block;
  color: #fff;
  font-size: 10px;
  background: rgb(116, 89, 49);
  border-radius: 5px;
  padding: 3px;

}

.discount-none {
  position: absolute; /* Абсолютное позиционирование */
  top: 0;
  left: 0;
  visibility: hidden; /* Просто скрываем, но сохраняем место */
  width: 0; /* Чтобы не занимала места */
  height: 0; /* Скрываем */

}

/* Новинка */
.new {
  position: absolute;
  top: 0;
  right:0;
  max-width: 50px;
}

/* Информация о товаре */

.main-goods-title {
  color: #fff;
}

.main-goods-title:hover {
  color: #ffa912;

}

.image-flag {
  max-height: 20px;
  margin-right: 5px;
}


/* Кнопка */
.add-to-cart {
  background-color: #ffa912;
  color: #fff;
  font-size: 0.9rem;
  border: none;
  border-radius: 4px;
  display: inline-block;
  transition: background-color 0.3s ease;
  padding: 5px;
  margin-bottom: 7px;
}

.add-to-cart:hover {
  background-color: rgb(34, 30, 42);
  color: rgb(255, 176, 38);
  border: solid 1px white;
}


/* Блок цен */
.priceBlock {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100% !important;
}

.ProductInfoBlock {
  display: flex;
  flex-direction: column;
  width: 100% !important;
}


.text-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  padding: 10px;
}
.main-goods-title {
  text-align: center;
  font-size: 1rem;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}


.country {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 5px;
}

.country a,
.country img {
  display: inline-block;
}

.priceBlock {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.CurrentPrice {
  font-size: 1.2rem;
  font-weight: bold;
  color: #28a745;
}

.OldPrice {
  font-size: 0.9rem;
  text-decoration: line-through;
  color: #f8494f;
}

.button-add {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

.add-to-cart {
  background-color: #ffa912;
  color: #fff;
  font-size: 0.9rem;
  border: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  padding: 5px 15px;
  text-align: center;
}

.add-to-cart:hover {
  background-color: rgb(34, 30, 42);
  color: rgb(255, 176, 38);
}

.add-to-cart i {
  margin-right: 0.3rem;
}
.priceBlock {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  min-height: 60px;
}

.OldPrice {
  font-size: 0.9rem;
  text-decoration: line-through;
  color: #f8494f;
  min-height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.CurrentPrice {
  font-size: 1.2rem;
  font-weight: bold;
  color: #28a745;
}
</style>
<script>
import {EventBus} from '../event-bus';

export default {
  data() {
    return {
      localProducts: this.products,
      currentPage: this.currentPage,
      page: 1,
      lastPage: this.lastPage,
      filters: {
        categories: [],
        brands: [],
        countries: [],
        is_sales: false,
        discount_percent: false,
        price: {
          min: this.price.min || 0,
          max: this.price.max || 0,
        },
        isWaiting: false, // Флаг ожидания

      },
    };
  },
  props: {
    products: {
      type: Array,
      required: true,
    },
    categories: {
      type: Array,
      required: true,
    },
    brands: {
      type: Array,
      required: true,
    },
    countries: {
      type: Array,
      required: true,
    },
    query: {
      type: String,
      required: true,
    },
    price: {
      type: Object,
      required: true,
    },
    currentPage: {
      type: Number,
      required: true,
    },
    lastPage: {
      type: Number,
      required: true,
    },
  },
  methods: {
    showLoading() {
      this.loading = true;
    },
    hideLoading() {
      this.loading = false;
    },

    resetToFirstPage() {
      this.currentPage = 1;
      this.fetchFilteredProducts();
    },
    updateFilters(filters) {
      this.filters = filters;
      console.log('update:', this.filters)
      this.resetToFirstPage();
    },

    fetchFilteredProducts() {
      // Предотвращаем повторный запрос, если пользователь активно меняет фильтры
      if (this.isWaiting) return;

      // Устанавливаем флаг ожидания, чтобы предотвратить частые запросы
      this.isWaiting = true;

      // Выполняем запрос
      axios
          .post("/searchResults/filter", {
            categories: this.filters.categories,
            brands: this.filters.brands,
            countries: this.filters.countries,
            is_sales: this.filters.is_sales,
            discount_percent: this.filters.discount_percent,
            priceRange: {
              min: this.filters.price.min,
              max: this.filters.price.max
            },
            page: this.currentPage, // Указываем текущую страницу для пагинации
          })
          .then((response) => {
            this.localProducts = response.data.data;
            this.currentPage = response.data.current_page;
            this.lastPage = response.data.last_page;
          })
          .catch((error) => {
            console.error("Ошибка при фильтрации:", error);
          })
          .finally(() => {
            // Снимаем флаг ожидания через небольшой промежуток
            setTimeout(() => {
              this.isWaiting = false;
            }, 400); // Время задержки перед следующим запросом
          });
    },
    changePage(page) {
      if (page < 1 || page > this.lastPage) return;
      this.currentPage = page;
      this.fetchFilteredProducts();
    },
    getBasket() {
      this.showLoading();
      axios
          .get('/getBasket')
          .then((response) => {
            this.basket.count = response.data.quantity;
            this.basket.sum = response.data.sum;
            // обновляем корзину в апп блейде
            document.getElementById('cart-count').innerText = response.data.quantity;
            document.getElementById('cart-sum').innerText = response.data.sum;
          })
          .catch((error) => {
            console.error(error);
          })
          .finally(() => {
            this.hideLoading();
          });
    },

    addToBasket(productId) {
      const quantity = 1;
      this.showLoading();

      axios
          .post('/addProductToBasket', {quantity, productId})
          .then((response) => {
            if (response.data.result) {
              this.$swal({
                text: 'Товар успешно добавлен в корзину!',
                icon: 'success',
                buttons: false,
                timer: 1000,
              });
              this.getBasket(); // Обновляем корзину внутри компонента

            }
          })
          .catch((error) => {
            console.error(error);
            this.$swal({
              text: 'Ошибка при добавлении в корзину',
              icon: 'error',
              buttons: false,
              timer: 1000,
            });
          })
          .finally(() => {
            this.hideLoading();
          });
    },


  },
  mounted() {
    this.getBasket();
    console.log(this.price);
    console.log(this.lastPage);
    console.log(this.currentPage);
    this.filters.price.min = this.price.min || 0;
    this.filters.price.max = this.price.max || 1000;
    EventBus.$on('filter-updated', (filters) => {
      this.updateFilters(filters);
    });
  },
  watch: {
    'filters.price': {
      handler() {
        this.resetToFirstPage(); // Сбрасываем страницу при изменении диапазона цен
      },
      deep: true, // Глубокое отслеживание объекта
    },
    filters: {
      handler() {
        this.resetToFirstPage(); // Для всех фильтров
      },
      deep: true,
    }
  }
}
;
</script>


