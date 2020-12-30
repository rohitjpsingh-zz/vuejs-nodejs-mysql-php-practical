// import connection
import db from "../config/database.js";
 
// Get All Products
export const getProducts = (req, result) => {
    var fullUrl 	= req.protocol + '://' + req.get('host');
    db.query("SELECT *,case when product_image != '' then CONCAT('"+fullUrl+"/products/', product_image) else '' end as product_image FROM product", (err, results) => {             
        if(err) {
            console.log(err);
            result(err, null);
        } else {
            result(null, results);
        }
    });   
}
 
// Get Single Product
export const getProductById = (req, result) => {
    var id = req.params.id;
    var fullUrl 	= req.protocol + '://' + req.get('host');
    db.query("SELECT *,case when product_image != '' then CONCAT('"+fullUrl+"/products/', product_image) else '' end as product_image FROM product WHERE product_id = ?", [id], (err, results) => {             
        if(err) {
            console.log(err);
            result(err, null);
        } else {
            result(null, results[0]);
        }
    });   
}
 
// Insert Product to Database
export const insertProduct = (data, result) => {
    db.query("INSERT INTO product SET ?", [data], (err, results) => {             
        if(err) {
            console.log(err);
            result(err, null);
        } else {
            result(null, results);
        }
    });   
}
 
// Update Product to Database
export const updateProductById = (data, id, result) => {

    var product_image = (data.product_image) ? `,product_image = ${data,product_image}` : '';

    var product_set = {
        "product_name":data.product_name,
        "product_price":data.product_price,
        "product_desc":data.product_desc,
    }

    if(data.product_image) product_set["product_image"] = data.product_image;

    db.query("UPDATE product SET ? WHERE product_id = ?", [product_set, id], (err, results) => {             
        if(err) {
            console.log(err);
            result(err, null);
        } else {
            result(null, results);
        }
    });   
}
 
// Delete Product to Database
export const deleteProductById = (id, result) => {
    db.query("DELETE FROM product WHERE product_id = ?", [id], (err, results) => {             
        if(err) {
            console.log(err);
            result(err, null);
        } else {
            result(null, results);
        }
    });   
}