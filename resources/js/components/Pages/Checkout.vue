<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Данные для доставки</h4>
                <form class="needs-validation" autocomplete="off" action="javascript:void(0);" id="form_checkout">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Имя</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" :value="user ? user['name'] : ''" required>
                            <div class="invalid-feedback"> Имя обязательна к заполнению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Фамилия</label>
                            <input type="text" class="form-control" id="lastName" required placeholder="" :value="user ? user['LastName'] : ''">
                            <div class="invalid-feedback"> Фамилия обязательна к заполнению. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone">Телефон </label>
                        <input type="text" class="form-control" id="phone" required placeholder="+38(0xx)xxxxxxx" :value="user ? user['phone'] : ''">
                        <div class="invalid-feedback"> Телефон обязателен к заполенению. </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="regions">Область</label>
                            <input list="region-list" class="form-control d-block w-100" id="regions" required onchange="getCities()" :value="user ? user['region'] : ''">

                            <datalist id="region-list">
                                <option value="">Выберете...</option>
                                <option v-for="(region, key) in regions" :key="key" :selected="user && region == user['region']"  :value="region">{{ region }}</option>
                            </datalist>
                            <div class="invalid-feedback"> Область обязательна к заполенению. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cities">Город</label>
                            <input list="city-list" class="form-control d-block w-100" id="cities" onclick="checkRegion()" required onchange="getMailDepartment()" autocomplete="my-field-name1" :value="user ? user['cities'] : ''">

                            <datalist id="city-list">
                                <option value="">Выберете...</option>
                                <option v-if="cities != '' && user && user['cities']" v-for="(city,key) in cities" :key="key" :selected="user &&  city['name'] == user['cities']" :value="city['name']">{{ city['name'] }}</option>
                            </datalist>
                            <div class="invalid-feedback"> Город обязателен к заполенению. </div>
                        </div>
                        <div class="col-md-12 mb-12">
                            <label for="department">Отделение Новой Почты</label>
                            <select class="custom-select d-block w-100" id="department" onclick="checkCity()" required>
                            <option v-if="departaments != null && user && user['department']" v-for="(department,key) in departaments" :key="key" :selected="user &&  department['name'] == user['department']" :value="department['name']">{{ department['name'] }}</option>
                            </select>

                            <div class="invalid-feedback"> Отделение новой почты обязателен к заполенению. </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="mb-3">
                        <label for="email">Комментарий <span class="text-muted">(Опционально)</span></label>
                        <textarea class="form-control" id="comment" placeholder="Комментарий к заказу"></textarea>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="submitForm()">Оформить заказ</button>
                    <hr class="mb-4">
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Checkout",
    props: {
        user: {
            default: {
                'name': '',
                'LastName': '',
                'phone': '',
                'region': '',
                'cities': '',
                'department': ''
            }
        },
        regions: {
            default: () => []
        },
        cities: {
            default: () => []
        },
        departaments: {
            default: () => []
        }
    },
    mounted() {
        console.log(this.cities);
    }
}
</script>
