<template>
  <div class="filters">
    <h3 class="title text-center">Фильтр</h3>

    <!-- Категории -->
    <div class="filter-section">
      <h6 @click="toggleFilter('categories')" class="filter-header">
        <span>Категории</span>
        <span
            :class="{
            'filter-arrow-open': isFilterVisible.categories,
            'filter-arrow-closed': !isFilterVisible.categories,
          }"
            class="filter-arrow"
        >
          {{ isFilterVisible.categories ? '↑' : '↓' }}
        </span>
      </h6>
      <div v-if="isFilterVisible.categories">
        <div v-for="category in categories" :key="category.id">
          <input
              type="checkbox"
              :value="category.id"
              v-model="filters.categories"
              @change="emitFilterChange"
          />
          {{ category.name }}
        </div>
      </div>
    </div>

    <!-- Бренды -->
    <div class="filter-section">
      <h6 @click="toggleFilter('brands')" class="filter-header">
        <span>Бренды</span>
        <span
            :class="{
            'filter-arrow-open': isFilterVisible.brands,
            'filter-arrow-closed': !isFilterVisible.brands,
          }"
            class="filter-arrow"
        >
          {{ isFilterVisible.brands ? '↑' : '↓' }}
        </span>
      </h6>
      <div v-if="isFilterVisible.brands">
        <div v-for="brand in brands" :key="brand.id">
          <input
              type="checkbox"
              :value="brand.id"
              v-model="filters.brands"
              @change="emitFilterChange"
          />
          {{ brand.name }}
        </div>
      </div>
    </div>

    <!-- Страны -->
    <div class="filter-section">
      <h6 @click="toggleFilter('countries')" class="filter-header">
        <span>Страны</span>
        <span
            :class="{
            'filter-arrow-open': isFilterVisible.countries,
            'filter-arrow-closed': !isFilterVisible.countries,
          }"
            class="filter-arrow"
        >
          {{ isFilterVisible.countries ? '↑' : '↓' }}
        </span>
      </h6>
      <div v-if="isFilterVisible.countries">
        <div v-for="country in countries" :key="country.id">
          <input
              type="checkbox"
              :value="country.id"
              v-model="filters.countries"
              @change="emitFilterChange"
          />
          {{ country.name }}
        </div>
      </div>
    </div>

    <!-- Доступность и скидки -->
    <div>
      <label>
        <input
            type="checkbox"
            v-model="filters.is_sales"
            @change="emitFilterChange"
        />
        Только в наличии
      </label>
      <label>
        <input
            type="checkbox"
            v-model="filters.discount_percent"
            @change="emitFilterChange"
        />
        Со скидкой
      </label>
    </div>

    <!-- Фильтр цен -->
    <div>
      <label>
        Цена:
        <div class="range-wrapper">
          <span class="min-price">{{ filters.price.min }}</span>
          <input
              type="range"
              v-model.number="filters.price.min"
              :min="price.min"
              :max="price.max"
              @change="emitFilterChange"
          />
          <span class="max-price">{{ price.max }}</span>
        </div>
      </label>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../event-bus";

export default {
  props: {
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
    price: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      isFilterVisible: {
        categories: false,
        brands: false,
        countries: false,
      },
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
      },
    };
  },
  methods: {
    toggleFilter(filter) {
      this.isFilterVisible[filter] = !this.isFilterVisible[filter];
    },
    emitFilterChange() {
      // Отправка обновленных фильтров через EventBus
      EventBus.$emit("filter-updated", this.filters);
    },
  },
};
</script>

<style scoped>
/* Filter container styles */
.filters {
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  padding: 10px;
  width: 100%;
  max-width: 250px; /* Updated max width for smaller screens */
  margin: 0 auto;
  box-sizing: border-box;
}

/* Title */
.title {
  font-size: 16px; /* Adjusted for smaller screen */
  font-weight: 600;
  color: #333;
  margin-bottom: 15px;
}

/* Filter sections */
.filter-section {
  margin-bottom: 10px; /* Reduced margin for smaller screens */
}

/* Filter header styles */
.filter-header {
  font-size: 14px; /* Adjusted font size */
  font-weight: 500;
  color: #444;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 8px 12px; /* Reduced padding */
  border: 1px solid #ddd;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.filter-header:hover {
  background-color: #f0f0f0;
}

.filter-arrow {
  font-size: 16px; /* Adjusted arrow size */
  transition: transform 0.3s ease-in-out;
}

.filter-arrow-closed {
  transform: rotate(0deg); /* Arrow pointing down */
}

.filter-arrow-open {
  transform: rotate(180deg); /* Arrow pointing up */
}

/* Category, Brand, and Country list styles */
.filter-section div {
  padding-left: 10px; /* Reduced padding */
  font-size: 12px; /* Adjusted font size */
  color: #666;
}

input[type="checkbox"] {
  margin-right: 6px; /* Adjusted margin */
  cursor: pointer;
}

/* Availability and discount filters */
label {
  font-size: 12px; /* Adjusted font size */
  color: #555;
  display: block;
  margin-top: 6px; /* Reduced margin */
  cursor: pointer;
}

/* Price range filter */
.range-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 8px; /* Reduced margin */
}

.min-price,
.max-price {
  font-size: 12px; /* Adjusted font size */
  font-weight: 500;
  color: #333;
}

input[type="range"] {
  flex: 1;
  margin: 0 6px; /* Adjusted margin */
  height: 5px; /* Reduced height */
  background: #f0f0f0;
  border-radius: 3px;
  outline: none;
  cursor: pointer;
  transition: background 0.3s ease;
}

input[type="range"]:focus {
  background: #ccc; /* Maintain consistent style when focused */
}

/* Hover and active states for range slider */
input[type="range"]:hover,
input[type="range"]:active {
  background: #ccc; /* Prevent changes during interaction */
}

/* Hover effect for the entire filter container */
.filter-section:hover {
  background-color: #f9f9f9;
  border-radius: 6px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Mobile responsiveness for very small screens */
@media (max-width: 250px) {
  .filters {
    width: 100%;
    padding: 5px; /* Reduced padding for smaller screens */
  }

  .filter-header {
    font-size: 12px; /* Smaller font size */
    padding: 6px 8px; /* Adjust padding */
  }

  .range-wrapper {
    flex-direction: column; /* Stack elements vertically */
    align-items: stretch; /* Stretch to full width */
  }

  .min-price,
  .max-price {
    font-size: 10px; /* Smaller font size */
  }

  input[type="range"] {
    height: 4px; /* Smaller slider */
  }
}
</style>
