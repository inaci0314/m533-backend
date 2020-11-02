USE webshop;
-- fill categories
INSERT INTO categories(name) VALUES('Category1');
INSERT INTO categories(name) VALUES('Category2');
INSERT INTO categories(name) VALUES('Category3');
INSERT INTO categories(name) VALUES('Category4');
INSERT INTO categories(name) VALUES('Category5');
-- fill articles
INSERT INTO articles(name, description, stock, price) VALUES('Article1', '', 25, 125.50);
INSERT INTO articles(name, description, stock, price) VALUES('Article2', '', 53, 3.50);
INSERT INTO articles(name, description, stock, price) VALUES('Article3', '', 80, 49.95);
INSERT INTO articles(name, description, stock, price) VALUES('Article4', '', 37, 250);
INSERT INTO articles(name, description, stock, price) VALUES('Article5', '', 60, 14.95);
