CREATE TABLE product (
    productID SERIAL PRIMARY KEY NOT NULL,
    productName VARCHAR(50),
    productDescription VARCHAR(100),
    productImage VARCHAR(300),
    productPrice DOUBLE PRECISION
);

INSERT INTO product (productName, productDescription, productImage, productPrice) VALUES
("Nike Air Force 1 '07 LV8", "Men's Shoes", "https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/1fdea7e6-25a7-4eca-97d3-1dcb3d6927ce/air-force-1-07-lv8-shoes-9KwrSk.png", 6895),
("Nike Sportswear", "Women's T-shirt", "https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/f57c76d1-0aa3-4bd3-9a2a-3dda917abfa5/sportswear-t-shirt-8xf1GD.png", 1995),
("Nike Dunk High Retro SE", "Men's Shoes", "https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/98e8ea6a-2304-41e2-b270-023823eb1bdc/dunk-high-retro-se-shoes-ZgKR1S.png", 7095),
("Nike Sportswear Tech Pack", "Women's Tie-Dye Dress", "https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/db25cb78-5d97-4bbb-a131-01da75097189/sportswear-tech-pack-tie-dye-dress-VCNfxz.png", 4995),
("Nike Dri-FIT Giannis Heritage86", "Basketball Cap", "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/0674bdb7-d439-418e-885d-ffdc3519f8c0/dri-fit-giannis-heritage86-basketball-cap-dN9WQz.png", 1039),
("Jordan", "Everyday No-Show Socks (3 Pairs)", "https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/bffe68e3-b4a8-499d-b7a2-8762550bf704/jordan-everyday-no-show-socks-cT9mkH.png", 995);

CREATE TABLE tbluseraccount (
    userid SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL
);