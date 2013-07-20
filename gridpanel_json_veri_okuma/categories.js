Ext.onReady(function(){   
    // Store nesnesi veri saklamak için kullanılır.
    // Sunucu(server-side) dan çekilen verinin istemci(client-side) 
    // tarafındaki halidir diyebiliriz özetle.
    // verinin en son değişen hali store üzerinde tutulur.
    // Farz-ı misal :)
    // Aşağıdaki gridi bu categoryStore nesnesine bağladığınızda
    // grid veya başka bir nesnede olabilir,grid üzerindeki veri de yaptığınız
    // her değişiklik(ekleme,silme,değiştirme) store nesnesine yansıtılır.
    // url : json veya xml formatındaki veri kaynağının adresi atanabilir
    var categoryStore = Ext.create('Ext.data.JsonStore', {
        fields: [
        {
            name: 'id'
        },

        {
            name: 'categoryname'
        }],
        autoLoad: true,
        proxy: {
            type: 'ajax',
            url: 'getdata.php',
            reader: {
                type: 'json',
                root: 'category'
            }
        }
    });
            
        
    //Gridpanel nesnesi oluşturuyoruz.
    //Gridpanelde göstereceğimiz veri kaynağını store özelliği ile belirtiyoruz.
    //renderTo özelliği gridi nereden göstereceksek onu belirtiyoruz.
    var gridPanel=Ext.create('Ext.grid.Panel', {
        renderTo: Ext.getBody(),
        store: categoryStore,
        width: 400,
        height: 200,
        title: 'Categories',
        columns: [
        {
            text: 'No',
            width: 50,
            dataIndex: 'id'
        },
        {
            text: 'Kategori Adı',
            width: 150,
            dataIndex: 'categoryname'
        }
        ]
    });
            
    //instance üzerinden nesnenin üyelerine erişim
    gridPanel.setTitle('Kategori Listesi');
            
});