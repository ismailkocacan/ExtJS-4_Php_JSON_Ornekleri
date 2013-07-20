Ext.onReady(function(){   
    // Store nesnesi veri saklamak için kullanılır.
    // Sunucu(server-side) dan çekilen verinin istemci(client-side) 
    // tarafındaki halidir diyebiliriz özetle.
    // verinin en son değişen hali store üzerinde tutulur.
    // Aşağıdaki gridi bu categoryStore nesnesine bağladığınızda
    // grid veya başka bir nesnede olabilir,grid üzerindeki veri de yaptığınız
    // her değişiklik(ekleme,silme,değiştirme) store nesnesine yansıtılır.
    // url : json veya xml formatındaki veri kaynağının adresi atanabilir
    var categoryStore = Ext.create('Ext.data.XmlStore', {
        fields: [
        {
            name: 'ContentID'
        },

        {
            name: 'Title'
        }],
        autoLoad: true,
        proxy: {
            type: 'ajax',
            url: 'getdata.php',
            reader: {
                type: 'xml',
                root:'Rows',
                record:'Row',
                idProperty:'ContentID'
                
            }
        }
    });
  
            
        
    //Gridpanel nesnesi oluşturuyoruz.
    //Gridpanelde göstereceğimiz veri kaynağını store özelliği ile belirtiyoruz.
    //renderTo özelliği gridi nereden gösterecek onu belirtiyoruz.
    var gridPanel=Ext.create('Ext.grid.Panel', {
        renderTo: Ext.getBody(),
        store: categoryStore,
        autoWidth:true,
        height: 600,
        title: 'Contents',
        columns: [
        {
            text: 'No',
            width: 50,
            dataIndex: 'ContentID'
        },
        {
            text: 'Başlık',
            width: 600,
            dataIndex: 'Title'
        }
        ]
    });
            
    //instance üzerinden nesnenin üyelerine erişim
    gridPanel.setTitle('Makaleler');
            
});