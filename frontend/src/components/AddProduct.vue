<template>
  <div>
    <div class="card mt-5">
      <header class="card-header">
        <p class="card-header-title">Add Product</p>
      </header>
      <div class="card-content">
        <div class="content">

          <div class="field">
            <label class="label">File</label>
            <div class="control">
              <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </div>
          </div>

          <div class="field">
            <label class="label">Product Name</label>
            <div class="control">
              <input
                class="input"
                type="text"
                placeholder="Product Name"
                v-model="productName"
              />
            </div>
          </div>

          <div class="field">
            <label class="label">Price</label>
            <div class="control">
              <input
                class="input"
                type="text"
                placeholder="Price"
                v-model="productPrice"
              />
            </div>
          </div>

          <div class="field">
            <label class="label">Description</label>
            <div class="control">
              <textarea class="input" name="" id="" cols="30" rows="10" placeholder="Description"
                v-model="productDesc"></textarea>            
            </div>
          </div>
        </div>
      </div>
      <footer class="card-footer">
        <div class="control">
          <button class="button is-success" @click="saveProduct">SAVE</button>
        </div>
      </footer>
    </div>
  </div>
</template>
 
<script>
// import axios
import axios from "axios";

export default {
  name: "AddProduct",
  data() {
    return {
      productName: "",
      productPrice: "",
      productDesc: "",
      file: ""
    };
  },
  methods: {
    // Create New product
    async saveProduct() {
      try {

        let formData = new FormData();
        formData.append('product_image', this.file);
        formData.append('product_name', this.productName);
        formData.append('product_price', this.productPrice);
        formData.append('product_desc', this.productDesc);


        await axios.post("http://localhost:5000/products", formData, {
          headers: {
              'Content-Type': 'multipart/form-data'
          }
        }).then(function(){
          console.log('SUCCESS!!');
        })
        .catch(function(){
          console.log('FAILURE!!');
        });
        this.productName = "";
        this.productPrice = "";
        this.productDesc = "";
        this.file = "";
        this.$router.push("/");
      } catch (err) {
        console.log(err);
      }
    },

    // HandleFile
    handleFileUpload(){
      this.file = this.$refs.file.files[0];
    }
  },
};
</script>
 
<style>
.card-footer .button{
  margin: 25px;
}
</style>