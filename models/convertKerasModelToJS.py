import tensorflowjs as tfjs
import tensorflow as tf
import os

os.mkdir('tmp_figures')
os.chdir('models')

models = os.listdir('.')

for name in models:
	rec = os.listdir(name)
	os.rename(name+'/'+rec[1], '../tmp_figures/'+name+'.png')
	os.rename(name, name+'_')
	os.rename(name+'/'+rec[0], name)
	os.remove(name+'_')


os.chdir('..')


for name in models:
	print('Converting ' + name)
	model = tf.keras.models.load_model('models/'+name)
	tfjs.converters.save_keras_model(model, 'js/'+name)
	os.rename('tmp_figures/'+name+'.png', 'js/'+name+'/figure.png')


os.rmdir('tmp_figures')
os.rmdir('models')
os.mkdir('models')