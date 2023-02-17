<template>
    <div class="col-12 col-lg-7">
        <div class="product-info-section p-3">
            
            
            <div class="row row-cols-auto align-items-center mt-3">
                <div class="col">
                    <label class="form-label">Quantity</label>
                    <select class="form-select form-select-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Size</label>
                    <select class="form-select form-select-sm" v-for="item in tailles" :key="item" >
                        <!-- <option v-for="item in item.tailles" :key="item">{{item}}</option> -->
                        <option v-if="size.includes(item.id)">{{item.libelle}}</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XS</option>
                        <option>XL</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Colors</label>
                    <div class="color-indigators d-flex align-items-center gap-2">
                        <div class="color-indigator-item bg-primary"></div>
                        <div class="color-indigator-item bg-danger"></div>
                        <div class="color-indigator-item bg-success"></div>
                        <div class="color-indigator-item bg-warning"></div>
                    </div>
                </div>
            </div>
            <!--end row-->
            
        </div>
    </div>
    <div>
        <div class="d-flex gap-2 mt-3">
        <a class="btn btn-dark btn-ecomm" @click.prevent="add"><i class="bx bxs-cart-add"></i>Add to Cart</a> 
        <a  class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
    </div>
    </div>
</template>

<script setup>
import {onMounted ,reactive, ref} from 'vue';
    const item= defineProps(['productId', 'couleurs', 'tailles']);

    let product=ref({})
    let size=ref([])

    const add =async()=> {
       await axios.get('/sanctum/csrf-cookie');
       await axios.get('/api/user')
            .then(async(res) => {
              let response=  await axios.post('/api/products', {
                product_id:item.productId
                })
                product.value=response
                size.value=product.value.data.taille.split(',')
                console.log(size.value)
            })
            .catch(error => console.log(error))
       
        
    }

</script>