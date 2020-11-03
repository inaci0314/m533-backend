USE webshop;
-- fill categories
INSERT INTO categories(id, name) VALUES(1, 'Category1');
INSERT INTO categories(id, name) VALUES(2, 'Category2');
INSERT INTO categories(id, name) VALUES(3, 'Category3');
INSERT INTO categories(id, name) VALUES(4, 'Category4');
INSERT INTO categories(id, name) VALUES(5, 'Category5');
-- fill articles
INSERT INTO articles(id, category_id, name, description, stock, price) VALUES(1, 3, 'Article1', '', 25, 125.50);
INSERT INTO articles(id, category_id, name, description, stock, price) VALUES(2, 4, 'Article2', '', 53, 3.50);
INSERT INTO articles(id, category_id, name, description, stock, price) VALUES(3, 5, 'Article3', '', 80, 49.95);
INSERT INTO articles(id, category_id, name, description, stock, price) VALUES(4, 5, 'Article4', '', 37, 250);
INSERT INTO articles(id, category_id, name, description, stock, price) VALUES(5, 3, 'Article5', '', 60, 14.95);
