// import path
import path from "path";

// Import function from Product Model
import { getProducts, getProductById, insertProduct, updateProductById, deleteProductById } from "../models/productModel.js";
 
// Get All Products
export const showProducts = (req, res) => {
    getProducts(req,(err, results) => {
        if (err){
            res.send(err);
        }else{
            res.json(results);
        }
    });
}
 
// Get Single Product 
export const showProductById = (req, res) => {
    getProductById(req, (err, results) => {
        if (err){
            res.send(err);
        }else{
            res.json(results);
        }
    });
}
 
// Create New Product
export const createProduct = (req, res) => {
    const data = req.body;
    console.log("req.body:",req.body);
    console.log("req.file:",req.files);
    // File Upload : Start
    var pic = (req.files && req.files.product_image) ? req.files.product_image : [];
    // console.log('photo type',typeof pic, 'length :',pic.length);
    if (req.files && typeof pic.length === "undefined") {
        // console.log('single file');
        var fileName = pic.md5 + path.extname(pic.name);
        var newpath = "./public/products/" + fileName;
        pic.mv(newpath, function(err) {
            if (err) { result("Error uploading file.", err); return; }
        });
        data.product_image = fileName;
    } else {
        data.product_image = '';
    }
    // File Upload : End

    insertProduct(data, (err, results) => {
        if (err){
            res.send(err);
        }else{
            res.json(results);
        }
    });
}
 
// Update Product
export const updateProduct = (req, res) => {
    const data  = req.body;
    const id    = req.params.id;
    console.log("req.body1:",req.body);
    console.log("req.file1:",req.files);
    // File Upload : Start
    var pic = (req.files && req.files.product_image) ? req.files.product_image : [];
    // console.log('photo type',typeof pic, 'length :',pic.length);
    if (req.files && typeof pic.length === "undefined") {
        // console.log('single file');
        var fileName = pic.md5 + path.extname(pic.name);
        var newpath = "./public/products/" + fileName;
        pic.mv(newpath, function(err) {
            if (err) { result("Error uploading file.", err); return; }
        });
        data.product_image = fileName;
    } else {
        data.product_image = '';
    }

    updateProductById(data, id, (err, results) => {
        if (err){
            res.send(err);
        }else{
            res.json(results);
        }
    });
}
 
// Delete Product
export const deleteProduct = (req, res) => {
    const id = req.params.id;
    deleteProductById(id, (err, results) => {
        if (err){
            res.send(err);
        }else{
            res.json(results);
        }
    });
}